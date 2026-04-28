export function openUserInfoHeader(){
    const header = document.querySelector('.div-user-infos-header');

    if (header) {
        header.classList.toggle('hidden');
    }
}

// função para fechar ao clicar fora
export function setupClickOutside() {
    const header = document.querySelector('.div-user-infos-header');
    const button = document.querySelector('#btn-user-info');

    document.addEventListener('click', (event) => {
        const clicouDentroHeader = header?.contains(event.target);
        const clicouNoBotao = button?.contains(event.target);

        if (!clicouDentroHeader && !clicouNoBotao) {
            header?.classList.add('hidden');
        }
    });
}

export function handleActions(){
    document.addEventListener('click', (event) => {
        const element = event.target.closest('[data-action]');
        if (!element) return;

        const action = element.dataset.action;


        const actions = {
            modal: () => {
                const target = element.dataset.modalId;
                openModal(target);
            },
            dropdown: () => {
                openDropdown(element);
            },
        };

        actions[action]?.();
    });
}


function openModal(selector){
    const modal = document.querySelector(selector);
    if (!modal) return

    modal.classList.remove('hidden', 'opacity-0', 'pointer-events-none');

    const content = modal.querySelector('.modal-content');
    content.classList.remove('scale-95');
    content.classList.add('scale-100');

}

function openDropdown(e){
    const dropdown = e.closest('.dropdown')
    const dropdownMenu = dropdown.querySelector('.dropdown-menu')

    // Fecha todos
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.add('hidden');
    });

    dropdownMenu.classList.toggle('hidden');

}


