
document.addEventListener('DOMContentLoaded', function () {
    const fields = document.getElementById('semester-field');
    fields.style = 'display: none';
    const roleSelector = document.getElementById('role');
    const programSelector = document.getElementById('programSelect');
    const radioButtonsContainer = document.getElementById('selectSemester');

    function generateRadioButtons(num) {
        let radioButtonsHtml = '';

        for (let i = 1; i <= num; i++) {
            radioButtonsHtml += `
            <div class="Radio-container">
                <input type="radio" name="semester" value="${i}">
                <label>${i}</label>
            </div>
                    `;
        }
        radioButtonsContainer.innerHTML = radioButtonsHtml;
    }
    function clearRadioButtons() {
        radioButtonsContainer.innerHTML = '';
    }
    programSelector.addEventListener('change', function () {
        const programId = this.value;

        if (!programId) {
            clearRadioButtons();
            return;
        }

        if (roleSelector.value === '1') {
            fields.style = 'display:flex';
            fetch(`/radio-semesters?program_id=${programId}`)
                .then(response => response.json())
                .then(data => {
                    const numRadioButtons = data.duration;
                    generateRadioButtons(numRadioButtons);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            fields.style = 'display:none';
            clearRadioButtons();
        }
    });

    roleSelector.addEventListener('change', function () {
        if (roleSelector.value !== '1') {
            clearRadioButtons();
            fields.style = 'display: none';
        } else {
            const programId = programSelector.value;

            if (programId) {
                fetch(`/radio-semesters?program_id=${programId}`)
                    .then(response => response.json())
                    .then(data => {
                        const numRadioButtons = data.duration;
                        generateRadioButtons(numRadioButtons);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                clearRadioButtons();
            }
        }
    });
});