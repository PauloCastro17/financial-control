<section class="m-5 p-4 flex flex-row border rounded-lg items-center justify-center border-[#282541]">

    <div id="chart"></div>


    <div id="chart2"></div>

</section>

<script>
    const payments = @json($payments);
    const transactions = @json($transactions);


    document.addEventListener('DOMContentLoaded', function () {

        const options = {
            chart: { type: 'bar', height: 300, width:400},
            series: [{ name: 'Pagamentos Recebidos', data: payments }],
            xaxis: { type: 'category' },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    borderRadius: 5,
                    borderRadiusApplication: 'end'
                },
            },
            colors: ['#29A073'],
            title: {
                text: 'Pagamentos Recebidos', // título do gráfico
                align: 'center',        // centralizado
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            },
        };

        const options2 = {
            chart: { type: 'bar', height: 300, width:400},
            series: [{ name: 'Transações Feitas', data: transactions }],
            xaxis: { type: 'category' },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    borderRadius: 5,
                    borderRadiusApplication: 'end'
                },
            },
            colors: ['#E5363D'],
            title: {
                text: 'Transações Feitas', // título do gráfico
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
