import React from 'react';

export default class Header extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return(
      <div>
        <ul>
          <li>Home</li>
          <li>Register</li>
        </ul>
      </div>
    )
  }
}

