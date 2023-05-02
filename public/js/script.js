
const radio = document.querySelectorAll("input[type='radio']");
const goal_id_element = document.getElementById('goal_id');
const goal_id = goal_id_element.value;
const inputField = document.getElementById('pdca_content');
const resetButton = document.getElementById('resetButton');

//いずれかのラジオボタンがクリックされたときそれ以外のラジオボタンがnoneになる
function hideRadioButtons() {
    for (let i = 0; i < radio.length; i++) {
        const target = radio[i].closest('.form-check');
        if(radio[i].checked) {
            target.style.display = 'inline-block';
            resetButton.style.display ='inline-block';
            get_data(i);
        }else {
            target.style.display = 'none';
        }
    }
}

for(let i = 0; i < radio.length; i++) {
    radio[i].addEventListener("click", hideRadioButtons);
}

//テキストボックスに現在の要素をデータを非同期で取得し、挿入
function get_data(i) {
    const pdca_elem = [
        'Plan', 'Do', 'Check', 'Act'
    ];

    $.ajax({
        url: `/api/goals/${goal_id}/pdcas?pdca_elem=${pdca_elem[i]}`,
        dataType: 'json',
        success: function(data) {
            if (data.hasOwnProperty('content')) {
                inputField.value = data.content;
            }else {
                inputField.value = '';
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    })
}

//resetButtonがクリックされたときラジオボタンがinline-blockになり、それ自身はnoneになる
resetButton.addEventListener("click", function() {
const formChecks = document.querySelectorAll('.form-check');
    for (let i = 0; i < formChecks.length; i++) {
        formChecks[i].style.display = 'inline-block';
        resetButton.style.display = 'none';
    }
});
