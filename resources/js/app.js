import './bootstrap';
import ApexCharts from 'apexcharts';
import {handleActions, openUserInfoHeader, setupClickOutside} from './functions/geral';
import TomSelect from "tom-select";

window.TomSelect = TomSelect;
window.ApexCharts = ApexCharts;
window.openUserInfoHeader = openUserInfoHeader;

document.addEventListener('DOMContentLoaded', () => {
    setupClickOutside();
    handleActions();

    document.addEventListener('click', (e) => {
        const button = e.target.closest('[data-action="closeModal"]');
        if (!button) return;

        const modal = button.closest('.modal');
        const content = modal.querySelector('div');

        modal.classList.add('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');

    });

    document.addEventListener('click', (e) => {
        const modal = document.querySelector('.modal:not(.opacity-0)');
        if (!modal) return;

        const content = modal.querySelector('.modal-content');

        const clicouDentro = content.contains(e.target);
        const clicouBotaoAbrir = e.target.closest('[data-action="modal"]');

        if (!clicouDentro && !clicouBotaoAbrir) {
            modal.classList.add('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }
    });
});
