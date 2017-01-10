import React from 'react';
import Input from '../Input';
import Strength from '../passStrength/Strength';
import RegisterActions from '../../actions/RegisterActions';

export default class Password extends React.Component {

  validatePassword = (passowrd) => {
    if (passowrd.length < 3) return 'length should be greater than 3';
    return '';
  };
  validateRepeatPassword = (password, compareValue) => {
    if (password !== compareValue) return 'two passwords do not match';
    return '';
  };

  handleBlur = (event) => {
    if (!this.props[event.target.name].isDirty) return;
    let passError = this.validatePassword(this.props.password.value);
    let repeatPassError = this.validateRepeatPassword(this.props.repeatPassword.value, this.props.password.value);

    RegisterActions.updateError('password', passError);
    RegisterActions.updateError('repeatPassword', repeatPassError);
  };

  render() {
    return (
        <div>
          <Input
              name="password"
              label="Password"
              type="password"
              onChange={this.props.onChange}
              onBlur={this.handleBlur}
              {...this.props.password}
          />
          <Strength
              className="col-sm-10 col-sm-offset-2"
              password={this.props.password.value}/>
          <Input
              name="repeatPassword"
              label="Repeat Password"
              type="password"
              onChange={this.props.onChange}
              onBlur={this.handleBlur}
              {...this.props.repeatPassword}
          />
        </div>
    )
  }
}