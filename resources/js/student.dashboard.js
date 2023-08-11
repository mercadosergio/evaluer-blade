let tabsContainer = document.querySelector("#tabs");

window.onload = function () {
    const liElements = tabsContainer.getElementsByTagName('li');

    liElements[0].className = "bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px";
    for (let i = 1; i < liElements.length; i++) {
        liElements[i].className = "px-4 text-gray-800 font-semibold py-2 rounded-t";
    }
    const tabContents = document.getElementById('tab-contents');
    const divElements = tabContents.getElementsByClassName('tab-div');

    for (let i = 1; i < divElements.length; i++) {
        divElements[i].classList.add('hidden');
    }
};

let tabTogglers = document.querySelectorAll("#tabs a");

console.log(tabTogglers);

tabTogglers.forEach(function (toggler) {
    toggler.addEventListener("click", function (e) {
        e.preventDefault();

        let tabName = this.getAttribute("href");

        let tabContents = document.querySelector("#tab-contents");

        for (let i = 0; i < tabContents.children.length; i++) {

            tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-white");
            tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white");
    });
});

let fieldsCount = 1;
const containerDiv = document.getElementById('fieldsContainer');
const btnAddFields = document.getElementById('addFields');
const courseInput = document.querySelector('#courseId');

function addSet() {
    if (fieldsCount < 3) {
        const field = document.createElement('div');
        field.className = 'fields-group flex items-center space-x-6 my-2 relative';
        field.innerHTML = `
                    <div class="w-full">
                        <label class="text-base font-medium mb-1">Documento de identidad:</label>
                        <input placeholder="Documento de identidad" type="text"
                            class="dniInput w-full rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            name="data[][dni]" list="dniDataList">
                    </div>
                        <ul class="searchResults absolute left-0 bottom-2/4" style="display: none;"></ul>
                    <div class="w-full">
                        <label class="text-base font-medium mb-1">Nombre del estudiante:</label>
                        <input readonly placeholder="Nombre completo" type="text"
                            class="fullname w-full rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            name="">
                    </div>
                    <input type="hidden" name="data[][id]" class="studentId">
      `;
        containerDiv.appendChild(field);
        fieldsCount++;
        const dniInputs = document.querySelectorAll('.dniInput');
        const ulResultsList = document.querySelectorAll('.searchResults');

        dniInputs.forEach((dniInput, index) => {
            autocomplete(dniInput, courseInput, ulResultsList[index]);
        });
    }
}

btnAddFields.addEventListener('click', addSet);

async function autocomplete(dniInput, courseInput, ulResults) {
    dniInput.addEventListener('input', async (event) => {
        const searchTerm = event.target.value;
        ulResults.innerHTML = '';

        if (searchTerm.length >= 3) {
            try {
                const response = await fetch(`/autocomplete-student?term=${searchTerm}&course_id=${courseInput.value}`);
                const data = await response.json();

                const field = dniInput.closest('.fields-group');
                const fullName = field.querySelector('.fullname');
                const studentId = field.querySelector('.studentId');

                data.forEach(item => {
                    const listItem = document.createElement('li');
                    listItem.className = 'cursor-pointer px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out';
                    listItem.textContent = `${item.dni} - ${item.names} ${item.first_lastname} ${item.second_lastname}`;
                    listItem.addEventListener('click', () => {
                        dniInput.value = item.dni;
                        fullName.value = `${item.names} ${item.first_lastname} ${item.second_lastname}`;
                        studentId.value = item.id;
                        ulResults.innerHTML = '';
                        ulResults.classList.remove('block');
                        ulResults.classList.add('hidden');
                    });
                    ulResults.appendChild(listItem);
                });
                ulResults.classList.remove('hidden');
                ulResults.classList.add('block')

            } catch (error) {
                console.error('Error al realizar la búsqueda:', error);
            }
        }
    });
}

const dniInputs = document.querySelectorAll('.dniInput');
const ulResultsList = document.querySelectorAll('.searchResults');

dniInputs.forEach((dniInput, index) => {
    autocomplete(dniInput, courseInput, ulResultsList[index]);
});