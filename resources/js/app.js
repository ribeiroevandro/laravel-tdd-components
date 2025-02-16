import './bootstrap';
import Alpine from 'alpinejs'

window.Alpine = Alpine

window.handleModal = (event, params = {}) => {
    console.log('handleModal', event, params)
    window.dispatchEvent(new CustomEvent(event, params));
}

Alpine.start()
