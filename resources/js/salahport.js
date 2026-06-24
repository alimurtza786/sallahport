document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initAirportTabs();
    initPrayerCountdown();
    initLazyImages();
    initMaps();
});

function initMobileMenu() {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    if (! btn || ! menu) {
        return;
    }

    btn.addEventListener('click', () => {
        const isOpen = ! menu.classList.contains('hidden');
        menu.classList.toggle('hidden', isOpen);
        btn.setAttribute('aria-expanded', String(! isOpen));
    });
}

function initAirportTabs() {
    document.querySelectorAll('[data-airport-tabs]').forEach((container) => {
        const buttons = container.querySelectorAll('[data-tab-button]');
        const panels = container.querySelectorAll('[data-tab-panel]');

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const tab = button.dataset.tabButton;

                buttons.forEach((btn) => {
                    const active = btn.dataset.tabButton === tab;
                    btn.classList.toggle('border-salahport-green', active);
                    btn.classList.toggle('text-salahport-green', active);
                    btn.classList.toggle('border-transparent', ! active);
                    btn.classList.toggle('text-salahport-muted', ! active);
                });

                panels.forEach((panel) => {
                    panel.classList.toggle('hidden', panel.dataset.tabPanel !== tab);
                });
            });
        });
    });
}

function initPrayerCountdown() {
    const el = document.getElementById('prayer-countdown');

    if (! el) {
        return;
    }

    const targetTime = el.dataset.target;

    if (! targetTime) {
        return;
    }

    const tick = () => {
        const now = new Date();
        const target = new Date();
        const [hours, minutes] = targetTime.split(':').map(Number);
        target.setHours(hours, minutes, 0, 0);

        if (target <= now) {
            target.setDate(target.getDate() + 1);
        }

        const diff = target - now;
        const h = Math.floor(diff / 3600000);
        const m = Math.floor((diff % 3600000) / 60000);
        const s = Math.floor((diff % 60000) / 1000);

        el.textContent = `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')} remaining`;
    };

    tick();
    setInterval(tick, 1000);
}

function initLazyImages() {
    document.querySelectorAll('img[loading="lazy"]').forEach((img) => {
        img.addEventListener('error', () => {
            img.classList.add('bg-gray-100');
        });
    });
}

function initMaps() {
    document.querySelectorAll('[data-leaflet-map]').forEach((element) => {
        if (typeof L === 'undefined') {
            return;
        }

        const airports = JSON.parse(element.dataset.airports || '[]');
        const zoom = Number(element.dataset.zoom || 2);
        const lat = Number(element.dataset.lat || 20);
        const lng = Number(element.dataset.lng || 0);

        const map = L.map(element, { scrollWheelZoom: false }).setView([lat, lng], zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
        }).addTo(map);

        airports.forEach((airport) => {
            L.marker([airport.latitude, airport.longitude])
                .addTo(map)
                .bindPopup(`<strong>${airport.name}</strong><br>${airport.code}`);
        });

        if (airports.length > 1) {
            const bounds = L.latLngBounds(airports.map((a) => [a.latitude, a.longitude]));
            map.fitBounds(bounds, { padding: [30, 30] });
        }
    });
}
