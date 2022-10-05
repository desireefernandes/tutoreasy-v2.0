import { Column, Entity, PrimaryGeneratedColumn, OneToMany, ManyToMany, JoinTable } from 'typeorm';
import { Tutorial } from 'src/tutorials/entities/tutorial.entity';
import { Follow } from 'src/follows/entities/follow.entity';
/**
 * 'user' é o nome da tabela que essa entidade representa no banco, nesse caso no Postgres
 * e cada atributo aqui dessa entidade seria uma coluna no banco
 */
@Entity('users')
export class User {
  @PrimaryGeneratedColumn({ type: 'int' })
  id: number;

  @Column()
  name: string;

  @Column()
  email: string;

  @Column()
  password: string;

  @OneToMany(type => Tutorial, tutorial => tutorial.user) 
  tutorials: Tutorial[];

  @ManyToMany(() => Follow)
  @JoinTable()
  followers: User[];
  
  @ManyToMany(() => Follow)
  @JoinTable()
  following: User[];
}
