import React, { Component } from 'react';

//component material
import Container from 'react-bootstrap/Container';


import Header from './Header'
import Body from './Body'


class Index extends React.Component {
  constructor (props){
    super(props)

  }
  render() {
    return (
            <Container fluid>
              <Header />
              <Body />
            </Container>
    );
  }
}
export default Index;
