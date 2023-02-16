var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
	'/plugins/jquery/jquery.min.js',
	'/plugins/bootstrap/js/bootstrap.bundle.min.js',

	'/plugins/fontawesome-free/css/all.min.css',
	'/dist/css/adminlte.min.css',
	'/dist/js/adminlte.min.js',
	'https://use.fontawesome.com/releases/v5.3.1/css/all.css',
	'/plugins/fontawesome-free/css/all.min.css',
	'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',	
	'/plugins/daterangepicker/daterangepicker.css',
	'/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
	'/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
	'/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
	'/plugins/select2/css/select2.min.css',
	'/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
	'/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
	'/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
	'/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
	'/css/permitkhas.css',

	'/plugins/viewerjs/viewer.min.js',
	'/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
	'/js/app-general.js',
	'/js/appmenu.js',
	'/js/datatables.min.js',
	'/plugins/datatables/jquery.dataTables.min.js',
	'/plugins/datatables-responsive/js/dataTables.responsive.min.js',
	'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
	'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',


	'https://fonts.googleapis.com/css?family=Numans',
	'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
	'/plugins/fontawesome-free/webfonts/fa-solid-900.woff2',
	'https://fonts.gstatic.com/s/sourcesanspro/v14/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7l.woff2',
	'https://fonts.gstatic.com/s/sourcesanspro/v14/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlxdu.woff2',

	'/images/logo.png',
	'/images/black_mamba2X.png',
	'/img/announcement.png',
	'https://kit.fontawesome.com/c931342d26.js',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});