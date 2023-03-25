import Pusher from 'pusher-js';
var pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});
var topic_id = window.location.href.split('/').pop();
var channel = pusher.subscribe('DisasterPrevention.' + topic_id);
channel.bind('MessageSent', function(data) {
    $("#board").append('<li>' + data.message.message + '</li>');
});

$("#submit").on("click", function(event) {
    event.preventDefault(); // デフォルトのフォーム送信を防止

    const url = "/topic_message";
    $.ajax({
        url: url,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'message': $("#text").val(),
            'topic_id': $("input[name='topic_id']").val()
        },
        method: "POST",
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function () {
            $("#text").val(""); // 入力フィールドを空にする
        },
        error: function () {
            alert("Failed to send message.");
        }
    });

});
