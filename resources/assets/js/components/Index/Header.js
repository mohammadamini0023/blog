//import component react & npm
import React, { Component } from 'react';
import {Link} from 'react-router-dom';



//imnport material
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Button from 'react-bootstrap/Button';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';


class Header extends React.Component {
  constructor (props){
    super(props)
    this.state={value:0}
  }

 render() {
   return (
     <div>
      <Row>
        <Col xl={10} className="col-centered">
         <Navbar bg="primary" variant="dark">
           <Navbar.Brand>Navbar</Navbar.Brand>
           <Nav className="mr-auto">
             <Nav.Link href="#home">Home</Nav.Link>
             <Nav.Link href="#features">Features</Nav.Link>
             <Nav.Link href="#pricing">Pricing</Nav.Link>
           </Nav>
           <Form inline>
             <FormControl type="text" placeholder="Search" className="mr-sm-2" />
             <Button variant="outline-light">Search</Button>
           </Form>
         </Navbar>
       </Col>
      </Row>
     </div>
    );
  }
}
export default Header;
