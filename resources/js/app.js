import './bootstrap';
import './ad-banner-manager';
import './ad-banner';
import '/public/assets/js/main'
import '/public/assets/js/code-editor'

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import('preline')


import ToastComponent from '../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts'

Alpine.data('ToastComponent', ToastComponent)
Alpine.plugin(focus);

window.Alpine = Alpine;

Alpine.start();