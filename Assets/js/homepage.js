(function () {
  window.onload = () => {
    const INTERVAL = 100;
    const WAIT_TIME = 2000;
    const movieList = [
      'Batman v Superman: Dawn of Justice',
      'Zootopia',
      'My Big Fat Greek Wedding 2',
      'Hardcore Henry'
    ];

    let target = document.querySelector('#target');
    
    const nextIndex = function* (list) {
      let index = 0;
      while (index < list.length) {
        yield list[index];
        index = index + 1;
        if (index === list.length) index = 0;
      }
    };

    const printTitle = (title) => {
      console.log(title);
      target.innerHTML = '';
      title.split('').map( (char, index) => {
        setTimeout(() => {
          target.innerHTML += char;
        }, index * INTERVAL);
      });
      return title.length * INTERVAL;
    };

    const movieGen = nextIndex(movieList);
    const animate = (list) => printTitle(movieGen.next().value);

    const startAnimation = (interval) => {
      setTimeout(() => {
        const newInterval = animate(movieList);
        startAnimation(newInterval);
      }, interval + WAIT_TIME);
    };

    startAnimation(2000);
  }
})();