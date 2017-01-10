import React from 'react';
import RegisterActions from '../../actions/RegisterActions';
import Input from '../Input';

export default class Username extends React.Component {
  validateUsername = (username) => {
    if (username.length < 3) return 'length should be greater than 3';
    return true;
  };
  // Only checks availability when username is valid.
  // checkusername method changes error prop of the username,
  // so it has to be executed if data is valid.
  handleBlur = (event) => {
    if(!this.props.username.isDirty) return;
    let validInfo = this.validateUsername(event.target.value);
    if(validInfo !== true) {
      return RegisterActions.updateError('username', validInfo);
    }
    if(validInfo === true) RegisterActions.checkAvailability('username', event.target.value);
  };

  render() {
    return (
        <Input
            name="username"
            label="Username"
            onChange={this.props.onChange}
            onBlur={this.handleBlur}
            {...this.props.username}
        />
    )
  }
}