//import component react & npm
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';
import {BrowserRouter as Router , Link , Route, Redirect ,Switch } from 'react-router-dom';
import cookie from 'cookiejs';


//imnport material
import {Cell, Grid, Row} from '@material/react-layout-grid'
import List, {ListItem, ListItemText} from '@material/react-list';
import Card, {CardPrimaryContent,CardMedia,CardActions,CardActionButtons,CardActionIcons} from '@material/react-card'

//import component me




class Index extends React.Component {
  constructor (props){
    super(props)
    this.state = {categorys:[]};

  }
  render() {
    return (
            <Grid>
            <Header />
            <Body urlcategory={this.props.match.params.categoryproducts} />
            </Grid>
    );
  }
}

class Header extends React.Component {
  constructor (props){
    super(props)
  }
  render(){
    return(
      <div>
          <Row  className="header-group" >
            <Cell columns={1}><Link to="/">Home</Link></Cell>
            <Cell columns={1}>Mozayedeh</Cell>
            <Cell columns={1}>Aboute Me</Cell>
            <Cell columns={1}>Protocol</Cell>
            <Cell columns={1}><Link to="/Aboute">Aboute</Link></Cell>
            <Cell columns={7}>sumbit</Cell>
          </Row>
      </div>
    );
  }
}

class Body extends React.Component{
  constructor (props){
    super(props)
    this.state = {categorys:[],products:[]};
    this.ButtonClick=this.ButtonClick.bind(this);
  }


  componentWillMount(){
    //get categorys
    Axios.get('http://localhost:8080/api/category',{params: {category_id: this.props.urlcategory}}).then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });

    //get Products
    Axios.get('http://localhost:8080/api/procat',{params: {category_id: this.props.urlcategory}}).then((response) => {
      this.setState({
        products : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });
  }




  ButtonClick(e,category){
    if(category.children.length == 0){
      this.setState({category_id:category.category_id});
        let cat=category.category_id;
        console.log(category.category_id);


      Axios.get('http://localhost:8080/api/procat',{params: {category_id: this.props.urlcategory}}).then((response) => {
                    this.setState({
                    products : response.data,
                    });
                }).catch( (error) => {
                    console.log(error);
                });

      }

    else if(true){

            let cat=category.category_id;
            Axios.get('http://localhost:8080/api/category',{params: {category_id: this.props.urlcategory}}).then((response) => {
                this.setState({categorys : response.data,});
                console.log(category.category_id);
              }).catch( (error) => {
                console.log(error);
              });

              Axios.get('http://localhost:8080/api/procat',{params: {category_id: this.props.urlcategory}}).then((response) => {
                    this.setState({
                    products : response.data,
                    });
                }).catch( (error) => {
                    console.log(error);
                });

    }
  }
  render() {
    return (
        <Row  className="menu-right-group" >
          <Cell columns={2}><MenuRight categorys={this.state.categorys} ButtonClick={this.ButtonClick}/></Cell>
          <Cell columns={10}><Products products={this.state.products} /></Cell>

        </Row>

    );
  }


}

class MenuRight extends React.Component {
  constructor (props){
    super(props)
    this.state = {categorys:[]};
  }

  renderRow(){
    return this.props.categorys.map((category) => {
      return(

        <Link to={'/products/'+category.category_id} >
          <ListItem key={category.category_id}  onClick={(e) => this.props.ButtonClick(e,category)}>
            <ListItemText   primaryText={category.category}  />
          </ListItem>
        </Link>
        );
    });
  }



  render(){
    return(
      <div>
        <List className="menu-right-group">
            {this.renderRow()}

        </List>
      </div>
    );
  }
}

class Products extends React.Component{
  constructor (props){
    super(props)
    this.state={imageProduct:[]};
  }

  renderProducts(){
    return this.props.products.map((product) => {
      let al=product.upload_image[0];
      return(
        <Cell key={product.product_id} columns={3}  >
          <Card>
                <h5>{product.title_product}</h5>
                <h5>{product.product_id}</h5>

          </Card>
        </Cell>
        );
    });
  }

  render(){
    return(
      <Row>
        {this.renderProducts()}
      </Row>
    );
  }
}

class Aboute extends React.Component {
  constructor (props){
    super(props)
  }
  render() {
    return(
      <div>
        <Grid>
          <Header />
          <Row>
            <Cell columns={12}>
              <Card> Aboute mozayedeh show</Card>
            </Cell>
          </Row>
        </Grid>
      </div>
    );
  }
}


class selectcity extends React.Component {
    constructor (props){
      super(props)
      this.state = {cityname:[],citycode:[],city:[]};
      this.handleclick=this.handleclick.bind(this);

    }

    componentWillMount(){
        //get city
        Axios.get('http://localhost:8080/api/getcity').then((response) => {
          this.setState({
            citys : response.data,
          });
        }).catch( (error) => {
          console.log(error);
        });
      }


      handleclick(cityname,citycode){
        cookie.set('cityname', cityname, 30);
        cookie.set('citycode', citycode, 30);
        this.setState({cityname : cityname});
        this.setState({citycode : citycode});

      }

      rendercity(){
        return this.state.citys.map((city) => {
            let citycode=city.city_id;
            let cityname=city.city;
          return(
            <Cell key={city.city_id} columns={3}  >
              <Card>
                    <h5 onClick={() => this.handleclick(cityname , citycode) } >{city.city}</h5>
                    <h5>{city.city_id}</h5>

              </Card>
            </Cell>
            );
        });
      }


    render() {
      if( cookie.get('cityname') != false && cookie.get('citycode') != false){
          let cityname = cookie.get('cityname');
          let citycode = cookie.get('citycode');

        return(
        <Redirect  to={'/'+citycode+'/'+cityname+'/products/'+0} />
        );
      }
      return(
        <div>
        <Grid>
        <Header />
          <Row  className="menu-right-group" >
            <Cell columns={6}>HI</Cell>
            <Cell columns={6}>{this.rendercity()}</Cell>
          </Row>
        </Grid>
        </div>
      );
    }
  }

export default class Exam extends React.Component {
  constructor (props){
    super(props)

  }
  render() {
    return (
      <Router>
        <div>
            <Switch>
                <Route exact path='/'  component={selectcity}  />

                <Route path="/Aboute" component={Aboute} />

                <Route  path='/city/:codecity/:namecity/products/:categoryproducts'  component={Index} />
            </Switch>
        </div>
      </Router>
    );
  }
}
ReactDOM.render(<Exam />, document.getElementById('root'));
