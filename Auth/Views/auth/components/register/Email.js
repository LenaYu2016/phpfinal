import React from 'react';
import RegisterActions from '../../actions/RegisterActions';
import Input from '../Input';

export default class Email extends React.Component {
  validateEmail = (email) => {
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regex.test(email)) return 'invalid email';

    return true;
  };

  handleBlur = (event) => {
    if(!this.props.email.isDirty) return ;
    let email = event.target.value;
    let validInfo = this.validateEmail(email);
    if(validInfo !== true) return RegisterActions.updateError('email', validInfo);
    if(validInfo === true) RegisterActions.checkAvailability('email', email);
  };

  render() {
    return (
        <Input
            name="email"
            label="Email"
            onChange={this.props.onChange}
            onBlur={this.handleBlur}
            {...this.props.email}
        />
    )
  }
}