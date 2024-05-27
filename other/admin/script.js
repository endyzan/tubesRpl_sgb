document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarToggleOutside = document.getElementById('sidebarToggleOutside');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.add('hidden');
        content.classList.add('fullwidth');
        sidebarToggle.classList.add('hidden');
        sidebarToggleOutside.classList.remove('hidden');
    });

    sidebarToggleOutside.addEventListener('click', function() {
        sidebar.classList.remove('hidden');
        content.classList.remove('fullwidth');
        sidebarToggle.classList.remove('hidden');
        sidebarToggleOutside.classList.add('hidden');
    });
});
