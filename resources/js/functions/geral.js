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
