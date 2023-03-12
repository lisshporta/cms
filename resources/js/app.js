import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';
import Clipboard from "@ryangjchandler/alpine-clipboard"

Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(Focus);
Alpine.plugin(Clipboard)

window.Alpine = Alpine;

Alpine.start();
