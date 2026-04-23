<section class="m-5 p-4 flex flex-row border rounded-lg items-center justify-center border-[#282541]">
    <div id="chart"></div>
</section>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const labels = @json($months);
        const income = @json($income);
        const expense = @json($expense);

        const options = {
            chart: { type: 'bar', height: 350, width:1200},
            series: [
                {
                    name: 'Entradas',
                    data: income
                },
                {
                    name: 'Saídas',
                    data: expense
                }
            ],
            xaxis: {
                categories: labels
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    borderRadius: 5,
                    borderRadiusApplication: 'end'
                },
            },
            colors: ['#29A073', '#E5363D'],
            title: {
                text: 'Transações em geral', // título do gráfico
                align: 'center',        // centralizado
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            },
        };



        let chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    });
</script>
