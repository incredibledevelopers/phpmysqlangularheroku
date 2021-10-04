import {Injectable} from '@angular/core';
import { HttpClient, HttpHeaders,HttpParams  } from '@angular/common/http';

import { User } from '../models/user.model';
import { environment } from '../../environments/environment';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable()
export class UserService {

  constructor(private http:HttpClient) {}

  private userUrl = environment.APIEndpoint;
  

  public getUsers() {
    return this.http.get<User[]>(this.userUrl);
  }

  public deleteUser(user) {
    console.log('id to delete : ',user.id);
    const params = new HttpParams()
    .set('user_id', user.id);
    return this.http.delete(this.userUrl + "?user_id="+user.id);
  }

  public createUser(user) {
    return this.http.post<User>(this.userUrl, user);
  }

}
