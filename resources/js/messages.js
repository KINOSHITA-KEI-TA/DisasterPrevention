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
    // console.log(data.message.topic.category_id);
    const senderId = data.user.id;
    const currentUserId = parseInt($("#current-user-id").val());
    if (data.message.message) {
        var formattedMessage = data.message.message.replace(/\n/g, '<br>');
    } else {
        var formattedMessage = "";
    }
    const formattedDate = formatDate(data.message.created_at);
    let replyHtml = '';
    if (data.message.reply_to) {
        replyHtml =
            '<div class="reply-info d-flex align-items-center ml-3" data-reply-to="' + data.message.reply_to.original_message.id + '">' +
                '<div class="reply-username">' + data.message.reply_to.original_message.user.name + '</div>' +
                '<div class="reply-message pl-2">' + data.message.reply_to.original_message.message + '</div>' +
            '</div>';
    }
    let imageHtml = '';
    if (data.message.images && data.message.images.length > 0) {
        data.message.images.forEach(function (image) {
            // 画像URLを取得
            const imageUrl = image.image_url;
            // 画像要素を作成
            imageHtml += '<img src="' + imageUrl + '" class="responsive-image">';
        });
    }
    if ($("#alternative-content").is(":visible")) {
        let messageId = data.message.id;
        let deleteButton = '';
        if (data.user.id == currentUserId) {
            deleteButton =
            '<form class="trash-icon" action="/message/' + data.message.topic.category_id + '/' + messageId + '/delete" method="POST">' +
                '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                '<button type="submit" style="border: none; background: none;">' +
                    '<i class="fas fa-trash-alt"></i>' +
                '</button>' +
            '</form>';
        }
        // console.log(imageHtml);
        let messageContainer =
            '<div class="message-container" data-message-id="' + messageId + '">' +
                '<div class="d-flex align-items-center">' +
                    '<div class="username">' + data.user.name + '</div>' +
                    '<div class="post-date ml-2">' + formattedDate + '</div>' +
                '</div>' +
                '<div class="message">' + formattedMessage +
                    '<div class="post-images">' + imageHtml + '</div>' +
                    '<div class="emoji-icon" data-target="#emoji-tool-' + messageId + '">' +
                        '<i>&#9786;</i>' +
                    '</div>' +
                    '<div class="emoji-tool" id="emoji-tool-' + messageId + '"></div>' +
                    '<div class="reply-icon">' +
                        '<i class="fas fa-reply"></i>' +
                    '</div>' +
                    deleteButton +
                '</div>' +
            '</div>';
        if (data.message.reply_to) {
            $("#replies-container").append(messageContainer);
            updateReplyCount({ messageId: data.message.reply_to.original_message.id });
        } else {
            $("#alternative-content").append(messageContainer);
        }
    } else {
        let messageId = data.message.id;
        let deleteButton = '';
        if (data.user.id == currentUserId) {
            deleteButton =
            '<form class="trash-icon" action="/message/' + data.message.topic.category_id + '/' + messageId + '/delete" method="POST">' +
                '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                '<button type="submit" style="border: none; background: none;">' +
                    '<i class="fas fa-trash-alt"></i>' +
                '</button>' +
            '</form>';
        }
        $("#board").append(
            replyHtml +
            '<div class="message-container" data-message-id="' + data.message.id + '">' +
                '<div class="d-flex align-items-center">' +
                    '<div class="username">' + data.user.name + '</div>' +
                    '<div class="post-date ml-2">' + formattedDate + '</div>' +
                '</div>' +
                '<div class="message">' + formattedMessage +
                '<div class="post-images">' + imageHtml + '</div>' +
                    '<div class="emoji-icon" data-target="#emoji-tool-' + messageId + '">' +
                        '<i>&#9786;</i>' +
                    '</div>' +
                    '<div class="emoji-tool" id="emoji-tool-' + messageId + '"></div>' +
                    '<div class="reply-icon">' +
                        '<i class="fas fa-reply"></i>' +
                    '</div>' +
                    deleteButton +
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
let selectedFiles = [];
function sendMessage(textareaId) {
    // バリデーション
    const messageElement = $("#" + textareaId);
    const message = messageElement.text();
    const files = selectedFiles;
    messageElement.removeClass('is-invalid');
    if (!message && (!files || files.length === 0)) {
        messageElement.addClass('is-invalid');
        return;
    }

    // メッセージ送信処理
    const url = "/topic_message";
    let data = new FormData();
    data.append('_token', $('meta[name="csrf-token"]').attr('content'));
    data.append('message', message);
    data.append('topic_id', $("input[name='topic_id']").val());

    // Add files
    for (let i = 0; i < files.length; i++) {
        data.append('image[' + i + ']', files[i]);
    }
    if (isReply) {
        data.append('message_id', messageId);
        data.append('is_reply', 1);
    }
    $.ajax({
        url: url,
        data: data,
        method: "POST",
        processData: false,
        contentType: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function () {
            $("#" + textareaId).text("");
            var repliesWindow = $('#replies-window');
            if (!repliesWindow.is(':visible')) {
                resetReplyState();
                $("#replying-to").addClass("d-none");
            }
            $('#image-container').empty();
            let editableTextHeight = Math.min(editableText.scrollHeight + 20, 170);
            let editableImageHeight = $('#image-container').children().length > 0 ? Math.min(editableImage.scrollHeight, 170) : 0;
            editableContainer.style.height = `${editableTextHeight + editableImageHeight}px`;
            selectedFiles = [];
        },
        error: function () {
            alert("メッセージの送信に失敗しました。");
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
    // toggleDisplay(isChecked);

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
            location.reload();
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
    var originalMessageContent = originalMessage.find('.originalMessage').html();
    var emojiReactionContent = originalMessage.find('.emojiReactionContent').html();
    var emojiReactionElement = '';
    // 削除されたメッセージの場合は絵文字も表示されないためemojiReactionContentはundefinedとなるため
    if (emojiReactionContent) {
        emojiReactionElement = `
                            ${emojiReactionContent}`;
    }
    var originalMessageImages = originalMessage.find('.post-images img');
    var imageHtml = '';
    if (originalMessageImages.length > 0) {
        originalMessageImages.each(function () {
            var imgSrc = $(this).attr('src');
            imageHtml += `<img src="${imgSrc}" alt="Message Image" class="img-fluid responsive-image">`;
        });
    }
    // console.log(emojiReactionContent)
    var replyCount = repliesCountElem.text();
    var repliesContainer = $('#replies-container');
    repliesContainer.empty();
    // 返信ウィンドウにオリジナルメッセージと返信件数を表示
    repliesContainer.html(`
    <div class="original-message">
        <div class="d-flex align-items-center">
            <div class="username">${originalMessageUsername}</div>
            <div class="post-date ml-2">${originalMessageDate}</div>
        </div>
        <div class="message">
            ${originalMessageContent}
        </div>
        <div class="post-images">
            ${imageHtml}
        </div>
        <div class="emoji-reactions">
            ${emojiReactionElement}
        </div>
    </div>
    <div class="replies-count mt-4" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
        ${replyCount}
    </div>
    `);

    // AJAX を使用して返信メッセージを取得
    $.ajax({
        url: '/get-replies/' + messageId,
        type: 'GET',
        dataType: 'json',
        success: function (replies) {
            console.log(replies);
            replies.forEach(function(reply) {
                const Dateformat = formatDate(reply.created_at);
                // console.log(reply.reply_to_message.images);
                // 返信メッセージのHTMLを作成
                var replyHtml = `
                    <div class="reply-message">
                        <div class="d-flex align-items-center">
                            <div class="username">${reply.reply_to_message.user.name}</div>
                            <div class="post-date ml-2">${Dateformat}</div>
                        </div>
                        <div class="message" style="margin-bottom: 40px;">
                        ${
                            reply.reply_to_message.deleted_at
                            ? '削除されたメッセージ'
                            : `${reply.reply_to_message.message}
                            ${
                                // 画像データの配列をループして、各画像を表示
                                reply.reply_to_message.images && reply.reply_to_message.images.length > 0
                                ? reply.reply_to_message.images.map(image =>
                                    `<div class="post-images">
                                    <img src="${image.image_url}" alt="投稿された画像" class="img-fluid responsive-image">
                                    </div>`
                                ).join('')
                                : ''
                            }
                                ${
                                    reply.reply_to_message.emoji_messages
                                    ? reply.reply_to_message.emoji_messages.map((emojiMessage, index) =>
                                        `
                                        <div class="emoji-reaction" style="left: ${20 + index * 15}px;">
                                            <span class="tooltip-text">${emojiMessage.user ? emojiMessage.user.name : ''}</span>
                                            ${emojiMessage.emoji ? emojiMessage.emoji.decimal_code : ''}
                                        </div>
                                        `
                                    ).join('')
                                    : ''
                                }
                            </div>
                        `
                        }
                    </div>`;

                // 返信メッセージをコンテナに追加
                repliesContainer.append(replyHtml);
                // console.log(reply);
            });

            $('.close-replies-window').on('click', function () {
                var repliesWindow = $('#replies-window');
                repliesWindow.animate({right: '-80%'}, 300, function() {
                    repliesWindow.hide();
                });
                resetReplyState();
            });
            var repliesWindow = $('#replies-window');
            if (repliesWindow.is(':visible')) {
                repliesWindow.animate({right: '-80%'}, 300, function() {
                    repliesWindow.hide();
                });
            } else {
                repliesWindow.show().animate({right: '0'}, 300);
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
            const leftPosition = $(".sidebar").outerWidth(true);
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
// 絵文字表示
$(document).ready(function() {
    $("#board").on('click', ".emoji-icon", function() {
        var target = $(this).data('target');
        $.get("/emojis", function(data) {
            let tooltipContent = '';
            data.forEach(function(emoji) {
                tooltipContent += `<span class="emoji-container"><span class="emoji" data-emoji-id="${emoji.id}">${emoji.decimal_code}</span></span>`;
            });
            $(target).html(tooltipContent).show();
        });
    });

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('emoji-icon')) {
            return;
        }
        $(".emoji-tool").hide();
    });
});
$(document).ready(function() {
    $("#alternative-content").on('click', ".emoji-icon", function() {
        var target = $(this).data('target');
        $.get("/emojis", function(data) {
            let tooltipContent = '';
            data.forEach(function(emoji) {
                tooltipContent += `<span class="emoji-container"><span class="emoji" data-emoji-id="${emoji.id}">${emoji.decimal_code}</span></span>`;
            });
            $(target).html(tooltipContent).show();
        });
    });

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('emoji-icon')) {
            return;
        }
        $(".emoji-tool2").hide();
    });
});
$(document).on("click", ".emoji", function() {
    var messageId = $(this).closest('.message-container').data('message-id');
    var emojiId = $(this).closest('.emoji').data('emoji-id');
    var userId = currentUser;
    $.ajax({
        url: '/emojis/create',
        type: 'POST',
        data: {
            'message_id': messageId,
            'emoji_id': emojiId,
            'user_id': userId,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            location.reload();
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$(document).ready(function () {
    $('#uploadButton').click(function () {
        $('#main-image').click();
    });

    $('#main-image').change(function () {
        if (this.files.length + selectedFiles.length > 3) {
            alert('一回の投稿で画像は3枚までです。');
            return; // 処理を中断
        }
        for (let file of this.files) {
            let reader = new FileReader();
                reader.onload = function (e) {
                var img = $('<img>').attr('src', e.target.result);
                img.css({
                    width: '62px',
                    height: '62px',
                    objectFit: 'cover',
                    borderRadius: '20px',
                });
                var closeButton = $('<span>&times;</span>').css({
                    position: 'absolute',
                    right: '-3px',
                    top: '-3px',
                    cursor: 'pointer',
                    border: '1px solid white',
                    backgroundColor: 'Black',
                    color: 'white',
                    fontSize: '10px',
                    borderRadius: '50%',
                    width: '15px',
                    height: '15px',
                    textAlign: 'center',
                    alignItem: 'center',
                    lineHeight: '12px',
                });
                // アイコンがクリックされたときに画像を削除
                closeButton.click(function () {
                    let parent = $(this).parent();
                    let index = $('#image-container').children().index(parent);
                    parent.remove();
                    let editableTextHeight = Math.min(editableText.scrollHeight + 20, 170);
                    let editableImageHeight = $('#image-container').children().length > 0 ? Math.min(editableImage.scrollHeight, 170) : 0;
                    editableContainer.style.height = `${editableTextHeight + editableImageHeight}px`;

                    selectedFiles.splice(index, 1);
                });
                let imgContainer = $('<div>').css({
                    position: 'relative',
                    display: 'inline-block'
                }).append(img, closeButton);
                $('#image-container').append(imgContainer);
            }
            reader.readAsDataURL(file);
            selectedFiles.push(file);
        }
    });
});

// 返信ウィンドウ画像選択
$(document).ready(function () {
    $('#repliesUploadButton').click(function () {
        $('#replies-image').click();
    });

    $('#replies-image').change(function () {
        if (this.files.length + selectedFiles.length > 3) {
            alert('一回の投稿で画像は3枚までです。');
            return; // 処理を中断
        }
        for (let file of this.files) {
            let reader = new FileReader();
                reader.onload = function (e) {
                var img = $('<img>').attr('src', e.target.result);
                img.css({
                    width: '62px',
                    height: '62px',
                    objectFit: 'cover',
                    borderRadius: '20px',
                });
                var closeButton = $('<span>&times;</span>').css({
                    position: 'absolute',
                    right: '-3px',
                    top: '-3px',
                    cursor: 'pointer',
                    border: '1px solid white',
                    backgroundColor: 'Black',
                    color: 'white',
                    fontSize: '10px',
                    borderRadius: '50%',
                    width: '15px',
                    height: '15px',
                    textAlign: 'center',
                    alignItem: 'center',
                    lineHeight: '12px',
                });
                // アイコンがクリックされたときに画像を削除
                closeButton.click(function () {
                    let parent = $(this).parent();
                    let index = $('#replies-image-container').children().index(parent);
                    parent.remove();
                    let editableTextHeight = Math.min(editableText.scrollHeight + 20, 170);
                    let editableImageHeight = $('#replies-image-container').children().length > 0 ? Math.min(editableImage.scrollHeight, 170) : 0;
                    editableContainer.style.height = `${editableTextHeight + editableImageHeight}px`;

                    selectedFiles.splice(index, 1);
                });
                let imgContainer = $('<div>').css({
                    position: 'relative',
                    display: 'inline-block'
                }).append(img, closeButton);
                $('#replies-image-container').append(imgContainer);
            }
            reader.readAsDataURL(file);
            selectedFiles.push(file);
        }
    });
});


let editableText2 = document.getElementById('text2');
let editableText1 = document.getElementById('text1');
let editableImage = document.getElementById('image-container');
let repliesEditableImage = document.getElementById('replies-image-container');
let repliesEditableContainer = document.querySelector('.replies-editable-container');
let editableContainer = document.querySelector('.editable-container');
let imageInput = document.getElementById('main-image');
let repliesImageInput = document.getElementById('replies-image');

editableText2.addEventListener('input', () => {
    let newHeight = Math.min(editableText2.scrollHeight + 20, 170);
    let imageHeight = $('#image-container').children().length > 0 ? Math.min(editableImage.scrollHeight, 170) : 0;
    editableContainer.style.height = `${newHeight + imageHeight}px`;

});
imageInput.addEventListener('change', () => {
    let file = imageInput.files[0];
    if (file) {
        const img = new Image();
        img.onload = function () {
            let imageHeight = $('#image-container').children().length > 0 ? Math.min(editableImage.scrollHeight, 170) : 0;
            editableImage.style.height = `${imageHeight}px`;
            let newHeight = Math.min(editableText2.scrollHeight + 20, 170);
            editableContainer.style.height = `${newHeight + imageHeight}px`;
            URL.revokeObjectURL(this.src);
        }
        img.src = URL.createObjectURL(file);
    }
});

editableText1.addEventListener('input', () => {
    let repliesNewHeight = Math.min(editableText1.scrollHeight + 20, 170);
    let repliesImageHeight = $('#replies-image-container').children().length > 0 ? Math.min(repliesEditableImage.scrollHeight, 170) : 0;
    repliesEditableContainer.style.height = `${repliesNewHeight + repliesImageHeight}px`;

});
repliesImageInput.addEventListener('change', () => {
    let file = repliesImageInput.files[0];
    if (file) {
        const img = new Image();
        img.onload = function () {
            let imageHeight = $('#replies-image-container').children().length > 0 ? Math.min(repliesEditableImage.scrollHeight, 170) : 0;
            repliesEditableImage.style.height = `${imageHeight}px`;
            let newHeight = Math.min(editableText1.scrollHeight + 20, 170);
            repliesEditableContainer.style.height = `${newHeight + imageHeight}px`;
            URL.revokeObjectURL(this.src);
        }
        img.src = URL.createObjectURL(file);
    }
});

// function displayModalImage(src) {
//     document.getElementById('modalImage').src = src;
// }





