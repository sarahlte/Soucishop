let date;

let vente;

let achat; 
fetch('./controllers/graph_ajax.php')
.then((response) => {
    if (!response.ok) {
        throw new Error("Problème - code d'état HTTP : " + response.status);
    }
    return response.json();
})
console.log(fetch('./controllers/graph_ajax.php')
.then((response) => {
    if (!response.ok) {
        throw new Error("Problème - code d'état HTTP : " + response.status);
    }
    return response.json();
}))
const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'bar',
    data: {
      labels: date,
      datasets: [{
        label: "Chiffre d'affaire",
        data: vente,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });



const actions = [
    {
      name: 'Randomize',
      handler(chart) {
        chart.data.datasets.forEach(dataset => {
          dataset.data = Utils.numbers({count: chart.data.labels.length, min: -100, max: 100});
        });
        chart.update();
      }
    },
    {
      name: 'Add Dataset',
      handler(chart) {
        const data = chart.data;
        const dsColor = Utils.namedColor(chart.data.datasets.length);
        const newDataset = {
          label: 'Dataset ' + (data.datasets.length + 1),
          backgroundColor: Utils.transparentize(dsColor, 0.5),
          borderColor: dsColor,
          borderWidth: 1,
          data: Utils.numbers({count: data.labels.length, min: -100, max: 100}),
        };
        chart.data.datasets.push(newDataset);
        chart.update();
      }
    },
    {
      name: 'Add Data',
      handler(chart) {
        const data = chart.data;
        if (data.datasets.length > 0) {
          data.labels = Utils.months({count: data.labels.length + 1});
  
          for (let index = 0; index < data.datasets.length; ++index) {
            data.datasets[index].data.push(Utils.rand(-100, 100));
          }
  
          chart.update();
        }
      }
    },
    {
      name: 'Remove Dataset',
      handler(chart) {
        chart.data.datasets.pop();
        chart.update();
      }
    },
    {
      name: 'Remove Data',
      handler(chart) {
        chart.data.labels.splice(-1, 1); // remove the label first
  
        chart.data.datasets.forEach(dataset => {
          dataset.data.pop();
        });
  
        chart.update();
      }
    }
  ];