const CACHE_NAME = 'newsreader-indexeddb';
var urlsToCache = [
	'/',
   './app',
   './public',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
   './app',
];

// install service worker ke dalam cache
self.addEventListener('install', function(event){
	event.waitUntil(
		caches.open(CACHE_NAME)
		.then(function(cache) {
			return cache.addAll(urlsToCache);
		})
	);
})

// menghapus cache lama dan menggantinya dengan cache baru
self.addEventListener('activate', function(event){
	event.waitUntil(
		caches.keys()
		.then(function(cacheNames) {
			return Promise.all(
				cacheNames.map(function(cacheName){
					if(cacheName != CACHE_NAME){	
						console.log("ServiceWorker: cache " + cacheName + " dihapus");
						return caches.delete(cacheName);
					}
				})
			);
		})
	);
})