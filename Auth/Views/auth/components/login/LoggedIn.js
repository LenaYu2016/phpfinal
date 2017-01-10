import React from 'react';

export default class LoggedIn extends React.Component {

  render() {
    return (
        <div>
          <p>Logged in as {this.props.username}</p>
          <button
              className="btn btn-block"
              onClick={this.props.onLogout}>Logout</button>
        </div>
    )
  }
}