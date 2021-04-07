let buttons = document.querySelectorAll('button');

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        setJson(button);
    })
})

function setJson(button) {
    let id = button.getAttribute('data-id');
    let action = button.getAttribute('data-action')
    fetch(`/basket/${action}/`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify({
                id: id
            })
        })
        .then(response => response.json())
}