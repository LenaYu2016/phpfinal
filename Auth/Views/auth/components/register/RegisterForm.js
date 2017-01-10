import React from 'react';
import Input from '../Input';
import Username from './Username';
import Password from './Password';
import Email from './Email';

export default class RegisterForm extends React.Component {

  render() {
    return (
        <form action="" method="post" className="form-horizontal"
              onSubmit={this.props.onSubmit}>
          <Username
              onChange={this.props.onChange}
              username={this.props.fields.username}
          />
          <Password
              password={this.props.fields.password}
              repeatPassword={this.props.fields.repeatPassword}
              onChange={this.props.onChange}
          />
          <Email
              email={this.props.fields.email}
              onChange={this.props.onChange}
          />
          <div className="col-sm-4 col-sm-offset-4">
            <button
                disabled={this.props.fields.allValid ? '' : 'disabled'}
                type="submit" name="register" className="btn btn-block btn-success">Register
            </button>
          </div>
          <p>{this.props.fields.submissionInfo}</p>
        </form>
    )
  }
}