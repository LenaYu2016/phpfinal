import React from 'react';
import MenuActions from '../actions/MenuActions';
import MenuTabItem from './MenuTabItem';

export default class MenuTab extends React.Component {

  static propTypes = {
    menu: React.PropTypes.array.isRequired,
    current: React.PropTypes.number.isRequired
  };

  constructor(props) {
    super(props);
    this.state = {disabled: -1};
  }

  handleEdit = (index) => (event) => {
    event.target.focus();
    this.setState({disabled: index});
  };
  handleQuitEdit = () => {
    this.setState({disabled: -1});
  };
  handleMenuChange = (index) => () => {
    MenuActions.switchMenu(index);
  };
  handleCreateMenu = () => {
    MenuActions.createNewMenu();
  };
  handleDelete = (index) => () => {
    console.log(index);
    MenuActions.deleteMenu(index);
  };
  handleMenuNameChange = (index) => (event) => {
    MenuActions.updateName(event.target.value, index);
  };

  render() {
    return (
        <div>
          <button className="btn btn-success" onClick={this.handleCreateMenu}>New Menu</button>
          <ul className="list-group">
            {this.props.menu.map((item, index) => {
              return (
                  <MenuTabItem
                      key={index}
                      name={item.name}
                      index={index}
                      disabled={this.state.disabled !== index ? 'disabled' : ''}
                      onBlur={this.handleQuitEdit}
                      onClick={this.handleMenuChange}
                      onDelete={this.handleDelete(index)}
                      onDoubleClick={this.handleEdit(index)}
                      onMenuChange={this.handleMenuChange(index)}
                      onNameChange={this.handleMenuNameChange(index)}
                  />
              )
            })}
          </ul>
        </div>
    )
  }
}