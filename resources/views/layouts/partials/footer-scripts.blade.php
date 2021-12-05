<script>
    const hamburgerIcon = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    hamburgerIcon.addEventListener('click', () => {
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    });

    const profileIcon = document.getElementById('profile');
    const profileMenu = document.getElementById('profileMenu');

    profileIcon.addEventListener('click', () => {
        if (profileMenu.classList.contains('hidden')) {
            profileMenu.classList.remove('hidden');
        } else {
            profileMenu.classList.add('hidden');
        }
    });
</script>