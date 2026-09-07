import Alpine from 'alpinejs'
import '@tailwindplus/elements'
import reply from './alpine/reply.js'

window.Alpine = Alpine

Alpine.data('reply', reply);
Alpine.start()
