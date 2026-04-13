import './bootstrap';

import ApexCharts from 'apexcharts';
import { openUserInfoHeader, setupClickOutside }  from './functions/geral';


window.ApexCharts = ApexCharts;
window.openUserInfoHeader = openUserInfoHeader;

document.addEventListener('DOMContentLoaded', () => {
    setupClickOutside();
});
