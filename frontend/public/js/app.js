document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', (event) => {
      event.preventDefault();
      window.location.href = 'dashboard.html';
    });
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    toggle?.addEventListener('click', () => {
      const visible = password.type === 'text';
      password.type = visible ? 'password' : 'text';
      toggle.textContent = visible ? 'Mostrar' : 'Ocultar';
    });
  }

  const sidebar = document.getElementById('sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  const menuToggle = document.getElementById('menuToggle');
  const closeMenu = () => { sidebar?.classList.remove('open'); backdrop?.classList.remove('show'); };
  menuToggle?.addEventListener('click', () => { sidebar.classList.toggle('open'); backdrop.classList.toggle('show'); });
  backdrop?.addEventListener('click', closeMenu);

  const overview = document.getElementById('overview');
  const placeholder = document.getElementById('modulePlaceholder');
  document.querySelectorAll('[data-section]').forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
      const section = link.dataset.section;
      document.querySelectorAll('.sidebar .nav-link').forEach(item => item.classList.toggle('active', item.dataset.section === section));
      document.getElementById('pageTitle').textContent = section === 'Inicio' ? 'Resumen general' : section;
      document.getElementById('breadcrumbCurrent').textContent = section === 'Inicio' ? 'Resumen' : section;
      overview.classList.toggle('d-none', section !== 'Inicio');
      placeholder.classList.toggle('d-none', section === 'Inicio');
      document.getElementById('moduleTitle').textContent = section;
      closeMenu();
    });
  });

  if (window.Chart) {
    const salesCanvas = document.getElementById('salesChart');
    if (salesCanvas) new Chart(salesCanvas, {
      type: 'line',
      data: { labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'], datasets: [{ label: 'Ventas', data: [620, 840, 710, 1080, 930, 1285, 990], borderColor: '#2e78b7', backgroundColor: 'rgba(46,120,183,.12)', fill: true, tension: .35, pointRadius: 3, pointBackgroundColor: '#2e78b7' }] },
      options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { color: '#edf2f6' }, ticks: { callback: value => '$' + value + ' mil' } }, x: { grid: { display: false } } } }
    });
    const categoryCanvas = document.getElementById('categoryChart');
    if (categoryCanvas) new Chart(categoryCanvas, {
      type: 'doughnut',
      data: { labels: ['Herramientas', 'Construcción', 'Pinturas', 'Otros'], datasets: [{ data: [32, 28, 22, 18], backgroundColor: ['#2e78b7', '#ef783c', '#64b6a5', '#a9c9e0'], borderWidth: 0 }] },
      options: { responsive: true, maintainAspectRatio: false, cutout: '68%', plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 7, padding: 15 } } } }
    });
  }
});