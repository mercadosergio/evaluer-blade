document.addEventListener('DOMContentLoaded', function () {
    var formPost = document.getElementById('form-post');
    var newPost = document.getElementById('new-post');
    var action = document.getElementById('action');

    formPost.style.display = 'none';

    newPost.addEventListener('click', function () {
        formPost.style.display = 'block';
        newPost.style.display = 'none';
    });

    action.addEventListener('click', function () {
        formPost.style.display = 'none';
        newPost.style.display = 'block';
    });
});

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });