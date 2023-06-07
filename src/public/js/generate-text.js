const repentanceBtn = document.getElementById('repentance_btn');
const responseTextArea = document.getElementById('response');
const loadingIcon = document.getElementById('loading-icon');

repentanceBtn.addEventListener('click', () => {
    const repentanceValue = document.getElementById('repentance').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    loadingIcon.classList.remove('hidden');

    fetch('/chatgpt', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ title: repentanceValue })
    }).then(response => {
        loadingIcon.classList.add('hidden');
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('POSTリクエストが失敗しました');
        }
    }).then(data => {
        responseTextArea.value = data;
    }).catch(error => {
        console.log(error);
    });
});
