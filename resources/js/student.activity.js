$('.Delete-file-button').hide();
$('.Preview').hide();

$('#upload_costum').change(function (event) {
    let file = event.target.files[0];
    let fileName = file.name;
    document.querySelector('.filename').textContent = fileName;
    $('.Delete-file-button').show();
    $('.Choose-file-button').hide();
    $('.Preview').show();

    $('.Delete-file-button').click(function () {
        $('.Delete-file-button').hide();
        $('.filename').val('');
        $('.Preview').hide();
    })
})