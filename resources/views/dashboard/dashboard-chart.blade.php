<section class="m-5 p-4 flex flex-row border rounded-lg items-center justify-center border-[#282541]">
    <div id="chart"></div>
</section>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const options = {
            chart: { type: 'bar', height: 350, width:1200},
            series: [
                {
                    name: 'Payments',
                    data: @json($payments)v
                },
                {
                    name: 'Transactions',
                    data: @json($transactions)
                }
            ],
            xaxis: {
                categories: @json($categories)
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

        let chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();


    });
</script>
