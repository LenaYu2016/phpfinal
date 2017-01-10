import React from 'react';
import Input from '../Input';

export default class LoginForm extends React.Component {
  render() {
    return (
        <form method="post" action="" className="form-horizontal"
              onSubmit={this.props.onSubmit}>
          <Input
              name="username"
              value={this.props.status.user.username}
              onChange={this.props.onChange}
              label="Username"
              placeholder="username here.."/>

          <Input
              name="password"
              value={this.props.status.user.password}
              onChange={this.props.onChange}
              type="password"
              label="Password"
              placeholder="Password here.."/>
          <p>{this.props.errorMsg}</p>
          <div className="col-sm-4 col-sm-offset-4">
            <button type="submit" className="btn btn-block btn-default">Login</button>
            <a href="/Auth/login/github" className="btn btn-block btn-social btn-github">
              <span className="fa fa-github"></span>sign in with github
            </a>
          </div>
        </form>

    );
  }
}