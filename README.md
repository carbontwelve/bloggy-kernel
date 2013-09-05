Carbontwelve/Bloggy
======

Bloggy package for laravel 4

== Features ==

  + Multi-domain out of the box
  + Polymorphic Taxonomy System
  + Content Types
  + Content Management
  + Media Management

== Tested ==

While I am not looking for 100% code coverage, a lot of the methods I write will have a unit test written to ensure they
work for the purpose they were written for.

== Version History ==

0.0.1 - Initial Fleshing out of the project, adding of docs, migrations and .gitkeep fluff

== Version Road map ==

=== 0.0.2 ===

  + Building Service Provider for Taxonomy
  + Writing Admin CRUD interface for Taxonomy
  + Building Unit Tests for Taxonomy Service Provider
  + Building Unit Tests for CRUD interface methods (browser interface testing will come later)

=== 0.0.3 ===

  + Writing migrations for Content Types
  + Building Service Provider for Content Types
  + Writing Admin CRUD interface for Content Types
  + Building Unit Tests for Content Types Service Provider
  + Building Unit Tests for CRUD interface methods

=== 0.0.4 ===

  + Writing migrations for Content
  + Building Service Provider for Content
  + Writing Admin CRUD interface for Content
  + Building Unit Tests for Content Service Provider
  + Building Unit Tests for CRUD interface methods

=== 0.0.5 ===

  + Writing migrations for Media
  + Building Service Provider for Media
  + Writing Admin CRUD interface for Media
  + Building Unit Tests for Content Service Provider
  + Building Unit Tests for CRUD interface methods

=== 0.0.6 ===

  + As Bloggy can depend upon Carbontwelve/Admin I shall write an admin dashboard widget to display # of posts, # of pages,
    # of categories and # of tags. This widget will be configurable to display custom taxonomy types and custom content
    types. Either through use of dashboard widget configuration page or via a hard coded text file - or both.
  + Writing migrations for Network
  + Writing admin interface for Network, this will allow the user to administrate more than one blog, networks will use
    Sentries groups and permissions system to ensure that a logged in user has permissions to view dashboard of one website
    over the other - with master admins being able to administrate all network sites.
