import React from 'react';

export default class Strength extends React.Component {

  calculateStrength = (pass) => {
    let level = 0;
    if(pass.length > 3) {
      level++;
      if(pass.search(/[A-Z]/g) !== -1) level ++;
      if(pass.search(/[0-9]/g) !== -1) level ++;
      if(pass.length > 8) level ++;
    }
    return level;
  };

  render() {
    let level = this.calculateStrength(this.props.password);
    return (
      <div className={this.props.className}>
        {(
          () => this.props.password ? <p>Password Strength Level: {level}</p> : ''
        )()}
      </div>
    )
  }
}