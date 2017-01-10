import React from 'react';
import LoginForm from './LoginForm';

export default class LoginApp extends React.Component {
  constructor() {
    super();
    this.state = {
      user: {username: '', password: ''}
    }
  }

  handleInputChange = (event) => {
    let field = event.target.name;
    this.state.user[field] = event.target.value;
    this.setState({user: this.state.user});
  };
  handleSubmit = (event) => {
    event.preventDefault();
    this.props.onSubmit(this.state.user.username, this.state.user.password);
  };

  render() {
    return (
        <LoginForm
            status={this.state}
            errorMsg={this.props.error}
            onChange={this.handleInputChange}
            onSubmit={this.handleSubmit}
        />
    )
  }

}
