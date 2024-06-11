const body = document.querySelector('body'),
    sidebar = body.querySelector('.sidebar'),
    toggle = body.querySelector('.toggle');

toggle.addEventListener('click', () => {
    sidebar.classList.toggle('close');
});

document.querySelector('.change-password-button').addEventListener('click', function() {
    // Add your password change logic here
    alert('Password changed successfully!');
});
