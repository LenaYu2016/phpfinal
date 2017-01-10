import React from 'react';
import ReactDOM from 'react-dom';
import MenuDisplay from './components/MenuDisplay';

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      menu: [],
      menuName: props.menuName
    };
  }
  componentDidMount() {
    $.getJSON(`/api/menu/${this.state.menuName}`, data => {
      console.log(JSON.parse(data));
      this.setState({menu: JSON.parse(data)});
    });
  }

  render() {
    return (
        <MenuDisplay menu={this.state.menu} />
    )
  }
}

const target = document.querySelector('#menuDisplay');
ReactDOM.render(<App menuName={target.getAttribute('data-menuName')} />, target);