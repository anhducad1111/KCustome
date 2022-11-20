// $(".like").click(function (e) {
//     e.preventDefault();
//     var t = null == e.target.previousElementSibling,
//         n = e.target.parentNode.dataset.postid,
//         r = {
//             isLike: t,
//             post_id: n,
//         };
//     axios.post("/like", r).then(function (t) {
//         $("[data-postid='" + t.data.post_id + "'] > .active-like").attr(
//             "class",
//             "bis like"
//         ),
//             (e.currentTarget.className = "bis like active-like");
//     });
// });

$(".like").on("click", function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;

    // ajaxSetup;
    $.ajax({
        type: "POST",
        url: urlLike,
        data: {
            postId: postId,
            isLike: isLike,
            _token: token
        }
    })
    .done(function(){
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' :
        event.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike' })
        if (isLike){
            event.target.nextElementSibling.innerText = 'Dislike';
        }else{
            event.target.previousElementSibling.innerText = 'Like';
        }
});