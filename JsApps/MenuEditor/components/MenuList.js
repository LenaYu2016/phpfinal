import React from 'react';
import update from 'react/lib/update';
import _ from 'lodash';
import MenuItem from './MenuItem';
import CollapseButton from './CollapseButton';


export default class MenuList extends React.Component {

  static propTypes = {
    menu: React.PropTypes.array.isRequired,
    onChange: React.PropTypes.func.isRequired,
    onDelete: React.PropTypes.func.isRequired
  };

  constructor() {
    super();
    this.state = {
      collapsedItems: []
    }
  }

  handleCollapse = (event) => {
    const parent = $(event.target).closest('li');
    const parentItem = {
      name: parent.find('input[name="name"]').first().val(),
      link: parent.find('input[name="link"]').first().val()
    };
    if (!_.find(this.state.collapsedItems, parentItem)) {
      this.setState(update(this.state, {
        collapsedItems: {
          $push: [parentItem]
        }
      }));
    } else {
      const newArray = this.state.collapsedItems
          .filter(item => !(item.name === parentItem.name && item.link === parentItem.link));
      this.setState({collapsedItems: newArray})
    }

  };

  handleInputChange = (id, prop) => (event) => {
    let menu = [].concat(this.props.menu);
    let menuItem = id.toString().split(',').reduce((acc, item) => {
      return acc[item];
    }, menu);
    menuItem[prop] = event.target.value;
    this.props.onChange(menu);
  };

  handleCustomPageChange = (id) => (pageId) => {
    const value = '/page/' + pageId;
    this.handleInputChange(id, 'link')({target:{value: value}});
  };

  drawMenu = (menuItems, baseIndex = '') => {
    return menuItems.map((item, index) => {
      let style = {minHeight: '10px', margin: '0 0 0 2em', padding: '0.5em'};

      // don't draw array - submenu
      // unique react id
      const id = baseIndex + index;
      const nextItem = menuItems[index + 1];
      // Set submenu
      let subMenu, collapseButton;
      if ($.isArray(nextItem) && nextItem.length > 0) subMenu = this.drawMenu(nextItem, baseIndex + (index + 1) + ',');
      if ($.isArray(item)) return;
      // If there is submenu, add collapse button
      if (subMenu) {
        const isCollapsed = _.find(this.state.collapsedItems, item) ? true : false;
        collapseButton = <CollapseButton
            isCollapsed={isCollapsed}
            onClick={this.handleCollapse}/>;
        if (isCollapsed) style.display = 'none';
      }
      const nameValueLink = {
        value: item.name,
        onChange: this.handleInputChange(id, 'name')
      };
      const linkValueLink = {
        value: item.link,
        onChange: this.handleInputChange(id, 'link')
      };

      let element = <MenuItem  {...item}
          pageList={this.props.pageList}
          customPageChange={this.handleCustomPageChange(id)}
          nameValueLink={nameValueLink}
          linkValueLink={linkValueLink}
          collapseButton={collapseButton}
          onChange={this.props.onChange}
          onDelete={this.props.onDelete}/>;

      return (
          <li key={id} data-id={id}>
            {element}
            <ul className="sortable" style={style}>
              {subMenu}
            </ul>
          </li>
      );
    })
  };

  render() {
    return (
        <ul className="sortable" style={{padding: '2em 0', border: '1px solid pink'}}>
          {this.drawMenu(this.props.menu)}
        </ul>
    )
  }
}