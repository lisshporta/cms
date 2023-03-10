import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';

Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(Focus);

window.Alpine = Alpine;

Alpine.start();
