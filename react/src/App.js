import React, { Component } from 'react';
import api from './services/api';

class App extends Component {

  state = {
    users: [],
  }

  async componentDidMount() {
    const response = await api.get('/users');

    this.setState({users: response.data});
  }

  render() {

    const {users} = this.state;
    
    return(
      <div>
        <h1>AA</h1>
      </div>
    );
  }
}

export default App;