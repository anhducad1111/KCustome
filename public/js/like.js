$(".like").click(function (e) {
    e.preventDefault();
    var t = null == e.target.previousElementSibling,
        n = e.target.parentNode.dataset.postid,
        r = {
            isLike: t,
            post_id: n,
        };
    axios.post("/like", r).then(function (t) {
        $("[data-postid='" + t.data.post_id + "'] > .active-like").attr(
            "class",
            "bis like"
        ),
            (e.currentTarget.className = "bis like active-like");
    });
});
