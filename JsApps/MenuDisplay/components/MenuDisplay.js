import React from 'react';
import '../style.css!';

export default class MenuDisplay extends React.Component {
  static propTypes = {
    menu: React.PropTypes.array.isRequired
  };

  drawMenu = (menu) => {
    return menu.map((item, index) => {
      let submenu = "";
      if ($.isArray(item)) return;
      if ($.isArray(menu[index + 1])) submenu = (
          <ul key={index}>{this.drawMenu(menu[index + 1])}</ul>
      );
      return (
          <li key={index}><a href={`http://${location.hostname}${item.link}`}>{item.name}</a>{submenu}</li>
      )
    })
  };

  render() {
    return (
        <div className="navigation">
          <ul>
            {this.drawMenu(this.props.menu)}
          </ul>
        </div>
    )
  }
}