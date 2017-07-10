$(document).ready(function(){
    $('body').on('click', '.zlrdn-comment-item-param-delete span', function(){
        var comment = $(this).parents('.zlrdn-comment-item');
        var commentId = $(this).data('id');

        $.ajax({
            url: '/comments/comment/delete?id=' + commentId,
            type: "POST",
            dataType: "json",
            data: {'id': commentId, '_csrf': $('meta[name=csrf-token]').attr("content")},
            success : function(response) {
                comment.remove();
            },
            failure : function(response){
                console.log('error response!!!');
                console.log(response);
            }
        });
    });

    $('body').on('click', '#zlrdn-add-comment-button', function(){
        var form = $(this).parents('form');

        $.ajax({
            url: form.attr('action'),
            type: "POST",
            dataType: "json",
            data: form.serialize(),
            success : function(response) {

                if (typeof response.model !== "undefined" && response.model) {
                    var comment = $('.zlrdn-comment-item-zero .zlrdn-comment-item').clone();
                    comment.find('.zlrdn-comment-item-content').html(response.model.content);
                    comment.find('.zlrdn-comment-item-param-author').html(response.model.author);
                    comment.find('.zlrdn-comment-item-param-date').html(response.model.date);

                    $('.zlrdn-comments-list').append(comment);
                    form.find('textarea').val('');
                }
            },
            failure : function(response){
                console.log('error response!!!');
                console.log(response);
            }
        });

        return false;
    });

});