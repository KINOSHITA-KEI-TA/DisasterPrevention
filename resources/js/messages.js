import Pusher from 'pusher-js';
var pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});
function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}/${month}/${day}`;
}
var topic_id = window.location.href.split('/').pop().replace('#', '');
var channel = pusher.subscribe('DisasterPrevention_' + topic_id);

channel.bind('MessageSent', function(data) {
    const senderId = data.user.id;
    const currentUserId = parseInt($("#current-user-id").val());
    var formattedMessage = data.message.message.replace(/\n/g, '<br>');
    const formattedDate = formatDate(data.message.created_at);
    let replyHtml = '';
    if (data.message.reply_to) {
        replyHtml =
            '<div class="reply-info d-flex align-items-center ml-3" data-reply-to="' + data.message.reply_to.original_message.id + '">' +
                '<div class="reply-username">' + data.message.reply_to.original_message.user.name + '</div>' +
                '<div class="reply-message pl-2">' + data.message.reply_to.original_message.message + '</div>' +
            '</div>';
    }
    if ($("#alternative-content").is(":visible")) {

        let messageId = data.message.id;
        let messageContainer =
            '<div class="message-container" data-message-id="' + messageId + '">' +
                '<div class="d-flex align-items-center">' +
                    '<div class="username">' + data.user.name + '</div>' +
                    '<div class="post-date ml-2">' + formattedDate + '</div>' +
                '</div>' +
                '<div class="message">' + formattedMessage +
                    '<div class="reply-icon">' +
                        '<i class="fas fa-reply"></i>' +
                    '</div>' +
                '</div>' +
            '</div>';
        if (data.message.reply_to) {
            $("#replies-container").append(messageContainer);
            updateReplyCount({ messageId: data.message.reply_to.original_message.id });
        } else {
            $("#alternative-content").append(messageContainer);
        }
    } else {
        $("#board").append(
            replyHtml +
            '<div class="message-container" data-message-id="' + data.message.id + '">' +
                '<div class="d-flex align-items-center">' +
                    '<div class="username">' + data.user.name + '</div>' +
                    '<div class="post-date ml-2">' + formattedDate + '</div>' +
                '</div>' +
                '<div class="message">' + formattedMessage +
                    '<div class="reply-icon">' +
                        '<i class="fas fa-reply"></i>' +
                    '</div>' +
                '</div>' +
            '</div>'
        );
    }
    if (senderId === currentUserId) {
        $("#fh5co-hero").scrollTop($("#fh5co-hero")[0].scrollHeight);
        $("#replies-container").scrollTop($("#replies-container")[0].scrollHeight);
    }
});

// 返信カウント更新
function updateReplyCount(data) {
    const originalMessageId = data.messageId;
    let repliesCountElem = $(`.replies-count[data-original-message-id='${originalMessageId}']`);
    const repliesWindowCountElem = $("#replies-window .replies-count");

    if (repliesCountElem.length === 0) {
        repliesCountElem = $('<a>', {
            href: '#',
            class: 'replies-count text-primary',
            style: 'cursor: pointer;',
            'data-original-message-id': originalMessageId,
            text: '1件の返信'
        });

        const messageContainer = $(`.message-container[data-message-id='${originalMessageId}']`);
        messageContainer.append(repliesCountElem);

        repliesCountElem.on('click', function () {
            openRepliesWindow($(this));
        });
    } else {
        const currentCount = parseInt(repliesCountElem.text());
        const updatedCountText = currentCount + 1 + '件の返信';
        repliesCountElem.text(updatedCountText);

        if (repliesWindowCountElem.length > 0) {
            repliesWindowCountElem.text(updatedCountText);
        }
    }
}


// メッセージ送信
function sendMessage(textareaId) {

    const url = "/topic_message";
    const data = {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'message': $("#" + textareaId).val(),
        'topic_id': $("input[name='topic_id']").val()
    };
    if (isReply) {
        data['message_id'] = messageId;
        data['is_reply'] = 1;
    }
    $.ajax({
        url: url,
        data: data,
        method: "POST",
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function () {
            $("#" + textareaId).val("");
            var repliesWindow = $('#replies-window');
            if (!repliesWindow.is(':visible')) {
                resetReplyState();
                $("#replying-to").addClass("d-none");
            }
        },
        error: function () {
            alert("Failed to send message.");
        }
    });
}
$(document).ready(function() {
    $("#repliesSubmit").on("click", function(event) {
        event.preventDefault();
        sendMessage("text1");
    });

    $("#messageSubmit").on("click", function(event) {
        event.preventDefault();
        sendMessage("text2");
    });
});


// 長押しで返信アイコンを表示
$(document).ready(function() {
    var timer;
    var longPressDuration = 1000;

    $(".message-container").on("touchstart", function() {
        var container = $(this);
        timer = setTimeout(function() {
            container.find(".reply-icon").fadeIn(200);
        }, longPressDuration);
    });

    $(".message-container").on("touchend touchcancel", function() {
        clearTimeout(timer);
    });

    $(".reply-icon").on("click touchend", function(event) {
        event.preventDefault();
        isReply = true;
        messageId = $(this).closest('.message-container').data('message-id');
    });
});

// 返信機能
let isReply = false;
let messageId;
function resetReplyState() {
    isReply = false;
    messageId = null;
}
$(document).on('click', '.reply-icon', function() {
    isReply = true;
    messageId = $(this).closest('.message-container').data('message-id');
    const messageContent = $(this).closest('.message').text();
    const truncatedMessageContent = messageContent.length > 40 ? messageContent.substr(0, 40) + '...' : messageContent;
    // 返信中のメッセージを表示
    $("#replying-to .replying-text").text(truncatedMessageContent + "に返信中" );
    $("#replying-to").removeClass("d-none");
});
$(document).on('click', '.cancel-reply', function(event) {
    event.preventDefault();
    resetReplyState();
    // 返信中のメッセージを非表示
    $("#replying-to").addClass("d-none");
});

// 返信先のメッセージにスクロール
document.addEventListener('DOMContentLoaded', function () {
    const replyInfoElements = document.querySelectorAll('.reply-info');
    replyInfoElements.forEach(function (replyInfo) {
        replyInfo.addEventListener('click', function () {
            const replyToId = this.getAttribute('data-reply-to');
            const targetMessage = document.getElementById('message-' + replyToId);

            if (targetMessage) {
                targetMessage.scrollIntoView({ behavior: 'instant', block: 'center' });

                // 強調表示のクラス追加
                targetMessage.classList.add('highlighted-message');

                // 一定時間後に強調表示のクラス削除
                setTimeout(function () {
                    targetMessage.classList.remove('highlighted-message');
                }, 2000);
            }
        });
    });
});

// 表示切り替えのチェックボックスが変更された時
function toggleDisplay(isChecked) {
    const messageBoard = document.getElementById('message-board');
    const alternativeContent = document.getElementById('alternative-content');

    if (isChecked) {
        messageBoard.style.display = 'none';
        alternativeContent.style.display = 'block';
    } else {
        messageBoard.style.display = 'block';
        alternativeContent.style.display = 'none';
    }
}
function updateDisplayFlag(checkbox) {
    const isChecked = checkbox.checked;
    toggleDisplay(isChecked);

    // CSRFトークンを取得
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Ajaxを使って、サーバー側のコントローラーにリクエストを送る
    fetch('/update-display-flag', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            user_id: '{{ Auth::id() }}',
            display_flg: isChecked
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('UserDisplayのdisplay_flgが更新されました');
        } else {
            console.error('UserDisplayのdisplay_flgの更新に失敗しました');
        }
    })
    .catch(error => {
        console.error('エラー:', error);
    });
}
document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('one');
    checkbox.addEventListener('change', function () {
        updateDisplayFlag(this);
    });

    // ページ読み込み時に表示を切替
    toggleDisplay(checkbox.checked);
});

// 返信ウィンドウ
$(document).ready(function () {
    $('.replies-count').on('click', function () {
        openRepliesWindow($(this));
    });
});
function openRepliesWindow(repliesCountElem) {
        messageId = repliesCountElem.data('original-message-id');
        var originalMessage = $('#message-' + messageId);
        isReply = true;
        var originalMessageUsername = originalMessage.find('.username').text();
        var originalMessageDate = originalMessage.find('.post-date').text();
        var originalMessageContent = originalMessage.find('.message').html();
        var replyCount = repliesCountElem.text();
        var repliesContainer = $('#replies-container');
        repliesContainer.empty(); // コンテナの中身を空にする
        // 返信ウィンドウにオリジナルメッセージと返信件数を表示
        repliesContainer.html(`
        <div class="original-message">
            <div class="d-flex align-items-center">
                <div class="username">${originalMessageUsername}</div>
                <div class="post-date ml-2">${originalMessageDate}</div>
            </div>
            <div class="message">${originalMessageContent}</div>
        </div>
        <div class="replies-count" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
            ${replyCount}
        </div>
        `);

        // AJAX を使用して返信メッセージを取得
        $.ajax({
            url: '/get-replies/' + messageId,
            type: 'GET',
            dataType: 'json',
            success: function (replies) {
                replies.forEach(function(reply) {
                    const Dateformat = formatDate(reply.created_at);
                    // 返信メッセージのHTMLを作成
                    var replyHtml = `
                        <div class="reply-message">
                            <div class="d-flex align-items-center">
                                <div class="username">${reply.reply_to_message.user.name}</div>
                                <div class="post-date ml-2">${Dateformat}</div>
                            </div>
                            <div class="message">
                            ${reply.reply_to_message.message}
                            </div>
                        </div>`;

                    // 返信メッセージをコンテナに追加
                    repliesContainer.append(replyHtml);
                });

                $('.close-replies-window').on('click', function () {
                    var repliesWindow = $('#replies-window');
                    repliesWindow.animate({right: '-80%'}, 500, function() {
                        repliesWindow.hide();
                    });
                    resetReplyState();
                });
                var repliesWindow = $('#replies-window');
                if (repliesWindow.is(':visible')) {
                    repliesWindow.animate({right: '-80%'}, 500, function() {
                        repliesWindow.hide();
                    });
                } else {
                    repliesWindow.show().animate({right: '0'}, 500);
                }
            }
        });
    }


// ディスプレイサイズ考慮してサイズ調整
$(document).ready(function () {
    function adjustContentHeight() {
        const footerHeight = $(".sticky-bottom-form").outerHeight(true);
        const headerHeight = $(".sticky-top-form").outerHeight(true);
        $(".topic_message_main").css("height", `calc(100vh - ${headerHeight}px + ${footerHeight}px) +10px`);
        $(".topic_message_main").css("padding-top", `${headerHeight}px`);
        $(".topic_message_main").css("padding-bottom", `${footerHeight}px`);
    }

    function adjustContentWidth() {
        const windowWidth = $(window).width();
        if (windowWidth >= 768) {
            const leftPosition = 302.4;
            $(".sticky-top-form, .sticky-bottom-form").css("left", `${leftPosition}px`);
            $(".sticky-top-form, .sticky-bottom-form").css("width", `calc(100% - ${leftPosition}px)`);
        } else {
            $(".sticky-top-form, .sticky-bottom-form").css("left", "0");
            $(".sticky-top-form, .sticky-bottom-form").css("width", "100%");
        }
    }

    adjustContentHeight();
    adjustContentWidth();

    // ウィンドウがリサイズされたときに高さと幅を調整
    $(window).resize(function () {
        adjustContentHeight();
        adjustContentWidth();
    });
    $("#fh5co-hero").scrollTop($("#fh5co-hero")[0].scrollHeight);
});

