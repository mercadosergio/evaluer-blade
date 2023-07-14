const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();
    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();
    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-active") &&
            formStep.classList.remove("form-step-active");
    });

    formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");
        } else {
            progressStep.classList.remove("progress-step-active");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

$(document).ready(function () {
    reloadFields();
    $('#countList').change(function () {
        reloadFields();
    });
});

function reloadFields() {
    var count = parseInt($('#countList').val()) + 1;
    var container = document.getElementById('fields');

    container.innerHTML = '';

    for (var i = 1; i < count; i++) {
        var div = document.createElement('div');
        div.classList.add('Member-div');

        var icon = document.createElement('i');
        icon.classList.add('bi');
        icon.classList.add('bi-person');

        var dniInput = document.createElement('input');
        dniInput.autocomplete = 'off';
        dniInput.type = 'text';
        dniInput.name = 'dnis[]';
        dniInput.placeholder = 'DNI';
        dniInput.classList.add('dni-input');
        dniInput.id = 'autocompleteInput' + i;

        var nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.name = 'fullname[]';
        nameInput.placeholder = 'Nombre completo';
        nameInput.classList.add('fullname-input');
        nameInput.readOnly = true;
        nameInput.id = 'namesAutocomplete' + i;

        var ul = document.createElement('ul');
        ul.classList.add('students-list');

        var idInput = document.createElement('input');
        idInput.type = 'text';
        idInput.name = 'id[]';
        idInput.placeholder = 'id';
        idInput.classList.add('id-input');
        idInput.id = 'idAutocomplete' + i;

        div.appendChild(icon);
        div.appendChild(dniInput);
        div.appendChild(nameInput);
        div.appendChild(ul);
        div.appendChild(idInput);

        container.appendChild(div);

        var courseId = $('#courseId').val();
        initializeAutocomplete(i, courseId);
    }
}

function initializeAutocomplete(id, courseId) {
    $('#autocompleteInput' + id).autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '/autocomplete-student',
                dataType: 'json',
                data: {
                    term: request.term,
                    courseId: courseId
                },
                success: function (data) {
                    response(data)
                }
            })
        },
        select: function (event, ui) {
            var selectedStudent = ui.item;

            $('#idAutocomplete' + id).val(selectedStudent.id);
            $('#namesAutocomplete' + id).val(selectedStudent.names + ' ' + selectedStudent.first_lastname + ' ' + selectedStudent.second_lastname);
        }
    });
}

// nameInput.addEventListener('input', function () {
        //     var query = $(this).val();
        //     var ulList = $('.students-list');

        //     $.ajax({
        //         url: '/autocomplete-student',
        //         type: 'GET',
        //         data: { query: query },
        //         success: function (response) {
        //             ulList.empty();
        //             response.students.forEach(function (student) {
        //                 var li = $('<li>').text(student.names + ' ' + student.lastnames);
        //                 li.attr('data-id', student.id);
        //                 ulList.append(li);
        //             });
        //         }
        //     });
        // });